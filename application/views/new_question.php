<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="added_question" method="post">
            <textarea class="add-ans" style="width:99%;height: 100px" name="new_question">Enter your question here</textarea>

            <input type="hidden" value="<?php echo $user?>" name="asked_by">
            <input type="submit" value="Submit" class="add-ans-sub">
</form>

</body>
</html>