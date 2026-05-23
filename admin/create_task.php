<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h3>Create a new task</h3>
    <div class="row">
        <div class= "col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label style="display:block; margin-bottom:5px;">Select user:</label>
            <select class="form-control" name="id" style="width:400px; padding:8px; border-radius:5px;">
                        <option>-select-</option>
                        <?php
                        include('../includes/connection.php');
                        $query = "select uid,name from users";
                        $query_run = mysqli_query($connection,$query);
                        if(mysqli_num_rows($query_run)){
                            while($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <option value="<?php echo $row['uid'];?>"
                                ><?php echo $row['name']; ?></option>
                                <?php
                        }
                        }
                        ?>
</select>
</div>
<div style="margin: bottom 5px; color:black;">


    <form  method="post" action="admin_dashboard.php">

        <div class="form-group" style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px;">Description:</label>
            <textarea class="form-control" name="description" rows="5" style="width:400px; padding:8px; border-radius:5px;" placeholder="Mention the task"></textarea>
        </div>

        <div class="form-group" style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px;">Start date:</label>
            <input type="date" name="start_date" class="form-control" style="width:400px; padding:8px; border-radius:5px;">
        </div>

        <div class="form-group" style="margin-bottom:15px;">
            <label style="display:block; margin-bottom:5px;">End date:</label>
            <input type="date" name="end_date" class="form-control" style="width:400px; padding:8px; border-radius:5px;">
        </div>
        <button type="submit"  name ="create_task" style="
    margin-top: 15px;
    width: 150px;
    padding: 10px;
    background-color: black;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 15px;
">
    Create Task
</button>

    </form>

</div>

</div>
</body>
</html>
