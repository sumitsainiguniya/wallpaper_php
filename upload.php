<?php
include 'header.php';
?>
<div class="container">
    <?php
    if(isset($_POST["submit"])) 
    {

        $target_file = basename($_FILES["fileToUpload"]["name"]);
        $imagename=basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (file_exists($target_file)) 
        {
            echo "<div class='alert alert-danger' role='alert'>Sorry, file already exists.</div>";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 50000000) 
        {
            echo "<div class='alert alert-danger' role='alert'>Sorry, your file is too large.</div>";
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
        {
            echo "<div class='alert alert-danger' role='alert'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) 
        {
            echo "<div class='alert alert-danger' role='alert'>Sorry, your file was not uploaded.</div>";      

        } 
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/".$target_file)) 
            {
                $catid=$_POST["cat_id"];
                $sql = "INSERT INTO wallpapers (cat_id, user_id, url) VALUES ('$catid', '1', '$target_file')";

                if ($conn->query($sql) === TRUE) 
                {

                    echo "<div class='alert alert-success' role='alert'>File Succesfully Uploaded</div>";
                } 
                else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;   
                }
            } 
            else
            {
                echo "<div class='alert alert-danger' role='alert'>File Cannot Upload</div>";
            }
        }
    }
    ?>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <label class="btn btn-primary mt-2" for="image_file">Upload Image File</label><br>

                <div id="error" style="display: none;"><h3>You should select valid image files only!</h3></div>
                <div id="error2" style="display: none;"><h3>An error occurred while uploading the file</h3></div>
                <div id="abort" style="display: none;"><h3>The upload has been canceled by the user or the browser dropped the connection</h3></div>
                <div id="warnsize" style="display: none;"><h3>Your file is very big. We can't accept it. Please select more small file</h3></div>
                <div class="container">
                    <div class="col-sm-6 offset-sm-3">
                        <img class=" img-fluid border border-dark" id='preview'><br>
                    </div>
                </div>
                <div id="fileinfo">
                    <div id="filename"></div>
                    <div id="filesize"></div>
                    <div id="filetype"></div>
                    <div id="filedim"></div>
                </div>
                <input class="mt-2" type="file" name="fileToUpload" id="image_file" onchange="fileSelected();"></input><br>
                <select class="mt-2" name="cat_id">
                    <?php
                    $sql = "SELECT id,name FROM categories";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {

                        while($row = $result->fetch_assoc()) 
                        {
                            echo "<option value='".$row['id']."'>".$row['name']."</option>";
                        }
                    }?>
                </select><br>
                <button class="btn btn-primary mt-2" type="submit" value="Upload Image" name="submit">Upload</button><br>

                <div id="progress_info">
                    <div id="progress"></div>
                    <div id="progress_percent">&nbsp;</div>
                    <div class="clear_both"></div>
                    <div>
                        <div id="speed">&nbsp;</div>
                        <div id="remaining">&nbsp;</div>
                        <div id="b_transfered">&nbsp;</div>
                        <div class="clear_both"></div>
                    </div>
                    <div id="upload_response"></div>
                </div>
            </form>
        </div>
    </div>
</div>