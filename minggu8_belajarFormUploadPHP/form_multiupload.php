<!DOCTYPE html>
<html>
    <head>
        <title>Multiupload Dokumen</title>
    </head>
    <body>
        <h2>
            <form action="proses_upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="files[]" multiple="multiple" accept=".jpg, .png, .jpeg, .gif" />
                <br><br>
                <input type="Submit" value="Unggah" />
            </form>
        </h2>
    </body>
</html>