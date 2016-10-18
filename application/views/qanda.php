<!doctype html>
<html>
<head>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.js"></script>
	<script>
        $(document).ready(function(){
        	$('.edit-ans').hide();
        	$('.edit-ans-sub').hide();
            $('.add-ans').hide();
            $('.add-ans-sub').hide();
            $('a').click(function(){
                var x=$(this).attr('dataans');
                $(this).siblings('.edit-ans').toggle();
                $(this).siblings('.edit-ans-sub').toggle();
                $(this).siblings('.edit-ans').val(x);       
            });

            $('a').click(function(){
                $(this).siblings('.add-ans').toggle();
                $(this).siblings('.add-ans-sub').toggle();
                  
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

        #user_name{
            text-align: right;
        }

    </style>
</head>
<body>

    
    <?php
        echo '<div id="user_name">';
        echo "<h1>".$user."</h1><a href='add_question'>Add a question</a>&nbsp&nbsp&nbsp<a href<br><a href='logout'>Logout</a><br>";
        echo '</div>';
    ?>
    <?php

        foreach($query as $result){
            echo '<b>Q:'.$result->question.'</b>';
            echo "<div class='answer'>";
            echo '<br><i>'.$result->answer_by.'</i>';
        	echo '<br><br><b><i>Ans: </b></i>'.$result->answer.'<br><br>';
            if(($result->answer_by)==$user){
                echo "<div class='textbox'>"; 
                echo '<a href="#" id="hyperlink_edit" dataans="'.$result->answer.'">edit answer</a><br><br>';
                echo "<textarea class='edit-ans'></textarea><input type='submit' value='Submit' class='edit-ans-sub'></div>";
                echo "</div>";
            }
            else{
                echo '<div class="add_answer">';
                echo '<form action="add_data" method="post">';
                echo '<a href="#" id="hyperlink_add">Add an answer</a><br><br>';
                echo '<textarea class="add-ans" style="width:99%;height: 100px" name="new_answer">Enter your answer here</textarea>';
                echo '<input type="hidden" value="'.$result->question.'" name="question">';
                echo '<input type="hidden" value="'.$user.'" name="answer_by">';
                echo '<input type="submit" value="Submit" class="add-ans-sub">';
                echo '</form>';
                echo '</div>';
                
            }
        }
    ?>
</body>
</html>