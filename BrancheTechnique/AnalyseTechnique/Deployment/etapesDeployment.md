
# **Complete Guide: Deploying a Laravel Project with Nginx on Linux (Step-by-Step)**

This guide walks you through setting up a **Linux server**, installing **Nginx**, configuring **Laravel**, setting up **MySQL**, and securing your site with **SSL**.

---

## **1. Setting Up a Linux Server**

### **1.1 Setting Up a Virtual Machine on Windows (Using VirtualBox)**

#### **1.1.1 Download Required Software**

- **[VirtualBox](https://www.virtualbox.org/)**
- **[Ubuntu Server 22.04 LTS ISO](https://ubuntu.com/download/server)**

#### **1.1.2 Create and Configure the Virtual Machine**

1. Open VirtualBox → Click **"New"**.
2. **Name** it `Ubuntu Server`, select **Linux (Ubuntu 64-bit)**.
3. Allocate **2GB+ RAM**.
4. Create a **20GB+ Virtual Hard Disk** (Dynamically allocated).
5. Select the Ubuntu ISO and **Start** the VM.

#### **1.1.3 Install Ubuntu Server**

- Select **"Install Ubuntu Server"**.
- Create a username and password.
- Skip optional software for now.
- Reboot when done.

#### **1.1.4 Set Up Network Configuration**

1. Open **VirtualBox** and select your Ubuntu VM.
2. Click **Settings** → **Network**.
3. For **Adapter 1**, set **Attached to** as **NAT**.
4. To allow your Windows machine to access the Ubuntu VM, add a port forwarding rule:
   - Click on **Advanced** → **Port Forwarding**.
   - Click the **+** icon to add a new rule.
   - Set the rule as follows:
     - **Name:** WebAccess (or any name you prefer)
     - **Protocol:** TCP
     - **Host IP:** (leave this blank or use `127.0.0.1` if you want only local access from Windows)
     - **Host Port:** 8080 (or any available port on your Windows machine)
     - **Guest IP:** (leave this blank, it will use the VM’s internal IP)
     - **Guest Port:** 80 (for HTTP, or 443 for HTTPS)

   Example:
   - **Host IP:** `127.0.0.1`
   - **Host Port:** `8080`
   - **Guest IP:** (leave it blank)
   - **Guest Port:** `80`

5. **Save** the settings and start your VM.

---

## **2. Installing Required Software**

### **2.1 Update System Packages**

```bash
sudo apt update && sudo apt upgrade -y
```

### **2.2 Install Nginx**

```bash
sudo apt install nginx -y
sudo systemctl enable --now nginx
```

Allow web traffic:

```bash
sudo ufw allow 'Nginx Full'
sudo ufw enable
```

### **2.3 Install MySQL**

```bash
sudo apt install mysql-server -y
sudo mysql_secure_installation
```

Log in to MySQL:

```bash
sudo mysql -u root -p
```

Create a database:

```sql
CREATE DATABASE laravel_db;
CREATE USER 'laravel_user'@'localhost' IDENTIFIED BY 'yourpassword';
GRANT ALL PRIVILEGES ON laravel_db.* TO 'laravel_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### **2.4 Install PHP & Extensions**

```bash
sudo apt install php8.1 php8.1-fpm php8.1-mysql php8.1-xml php8.1-bcmath php8.1-mbstring php8.1-curl php8.1-zip unzip -y
```

Check PHP version:

```bash
php -v
```

---

## **3. Setting Up Laravel Project**

### **3.1 Move Project to `/var/www/`**

Upload your Laravel project (via `scp` or `git clone`):

```bash
sudo mkdir -p /var/www/your_project
sudo chown -R $USER:$USER /var/www/your_project
```

Move your Laravel files inside `/var/www/your_project`.

### **3.2 Set Up `.env` File**

```bash
cp .env.example .env
nano .env
```

Edit database connection:

```
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=yourpassword
```

### **3.3 Install Laravel Dependencies**

```bash
composer install
php artisan key:generate
php artisan storage:link
```

### **3.4 Set Permissions**

```bash
sudo chown -R www-data:www-data /var/www/your_project/storage /var/www/your_project/bootstrap/cache
sudo chmod -R 775 /var/www/your_project/storage /var/www/your_project/bootstrap/cache
```

### **3.5 Run Database Migrations**

```bash
php artisan migrate --force
```

---

### **3.6 Install and Configure Vite**
If your project uses Vite:

```bash
npm install
npm run build
```

Make sure your `vite.config.js` file is correct:

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
```

---

## **4. Configuring Nginx for Laravel**

### **4.1 Create an Nginx Configuration File**

```bash
sudo nano /etc/nginx/sites-available/your_project
```

Paste the following:

```nginx
server {
    listen 80;
    server_name your_domain_or_ip;
    root /var/www/your_project/public;
    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

### **4.2 Enable and Test the Configuration**

```bash
sudo ln -s /etc/nginx/sites-available/your_project /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

---

## **5. Securing the Server with SSL**

### **5.1 Install Certbot for Free SSL**

```bash
sudo apt install certbot python3-certbot-nginx -y
```

### **5.2 Generate SSL Certificate**

```bash
sudo certbot --nginx -d your_domain_or_ip
```

Enable automatic renewal:

```bash
sudo systemctl enable certbot.timer
```

---

## **6. Monitoring & Troubleshooting**

### **6.1 Check Server Status**

```bash
sudo systemctl status nginx
sudo systemctl status php8.1-fpm
sudo systemctl status mysql
```

### **6.2 Check Logs**

```bash
sudo tail -f /var/log/nginx/access.log
sudo tail -f /var/log/nginx/error.log
sudo tail -f /var/log/mysql/error.log
```

### **6.3 Restart Services**

```bash
sudo systemctl restart nginx
sudo systemctl restart php8.1-fpm
sudo systemctl restart mysql
```

---

## **7. Automate Laravel Tasks with Supervisor**

### **7.1 Install Supervisor**

```bash
sudo apt install supervisor -y
```

### **7.2 Configure Queue Worker**

```bash
sudo nano /etc/supervisor/conf.d/laravel-worker.conf
```

Add:

```
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/your_project/artisan queue:work --tries=3
autostart=true
autorestart=true
numprocs=1
redirect_stderr=true
stdout_logfile=/var/www/your_project/storage/logs/worker.log
```

Enable it:

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start laravel-worker:*
```

---

## **Final Notes**

🚀 **You have successfully deployed your Laravel project with Nginx and MySQL on a Linux server!** 🚀