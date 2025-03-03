<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS de Summernote -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">

<!-- JS de Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>

</head>
<body>
    

<form action="process_form.php" method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="inputNom">Partie</label>
            <input name="projectName" type="text" class="form-control" id="inputNom" placeholder="Entrez le titre" value="SAS">
        </div>

        <div class="form-group">
            <label for="">Session</label>
            <input name="" type="" class="form-control" id="" placeholder="" value="1">
        </div>

        <div class="form-group">
            <label for="">Semaine</label>
            <input name="" type="" class="form-control" id="" placeholder="" value="38">
        </div>

        <div class="form-group">
            <label for="inputOhjectif">Objectif de session</label>
            <textarea id="summernote" name="objectif_plan" class="form-control" rows="7" id="inputObjectif" placeholder="Entrez les objectifs..."></textarea>
        </div>

        <div class="form-group">
            <label for="inputSujet">Sujets</label>
            <textarea id="summernote" name="sujets_formation" class="form-control" rows="7" id="inputSujet" placeholder="Entrez les sujets..."></textarea>
        </div>



        <div>
            <label for="cc_efm">CC/EFM</label>
            <input name="" type="" class="form-control" id="" placeholder="" value="CC1 SAS" >
        </div>

    </div>

    <div class="card-footer">
        <a href="./index.php" class="btn btn-default">Annuler</a>
        <button type="submit" class="btn btn-primary float-right">Ajouter</button>
    </div>
</form>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Initialize Quill editor
    var quill = new Quill('#inputDescription', {
      theme: 'snow'  // 'snow' is the built-in theme, you can customize this
    });
  </script>

  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- CSS de Bootstrap 4 -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- JS de Bootstrap 4 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Écrivez ici...',
                tabsize: 2,
                height: 200
            });
        });
    </script>
</body>
</html>