<!doctype html>
<html>
<head>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
	<script>
        $(document).ready(function(){
        	$('a').siblings('.edit-ans').hide();
        	$('a').siblings('.edit-ans-sub').hide();
            $('a').click(function(){
                var x=$(this).attr('dataans');
                $(this).siblings('.edit-ans').toggle();
                $(this).siblings('.edit-ans-sub').toggle();
                $(this).siblings('.edit-ans').val(x);
   

                
            });
            $('.edit-ans-sub').click(function(){
            	var y=$(this).siblings('.edit-ans').val();
            	var z=$(this).siblings('a').attr('dataans');
                 $.ajax({
                	type: 'POST',
                	data: { new_answer: y , prev_answer: z },
                	url: 'update',
                });
                location.reload();
            });

  			          
        });
	</script>
    <style>
        a{
            text-decoration: none;
            color: black;
        }
        .edit-ans{
        	height: 100px;
        	width: 99%;

        }

    </style>
</head>
<body>

    <?php
        echo "hello ".$user; 
        foreach($query as $result){
            echo '<b>Q:'.$result->question.'</b>';
            echo "<div class='answer'>";
            echo '<br><i>'.$result->answer_by.'</i>';
        	echo '<br><br><b><i>Ans: </b></i>'.$result->answer.'<br><br>';
            echo "<div class='textbox'>"; 
            echo '<a href="#" dataans="'.$result->answer.'">edit answer</a><br><br>';
            echo "<textarea class='edit-ans'></textarea><input type='submit' value='Submit' class='edit-ans-sub'></div>";
            echo "</div>";
        }
    ?>
</body>
</html>