<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/5b3fea805f.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="automatedsearch/style.css">
    <title>Autamted search bar using php</title>
</head>

<body>
    <div class="wrapper">
        <div class="text">
            <h1>Autocom Box for HD-MOVIES HUB Final</h1>
        </div>
        <div class="search-input">
            <form action="search" method="GET" class="search-box" autocomplete="false">
                <!------- input----------------->
                <input type="text" name="search" placeholder="Search here" required id="search" autocomplete="off">
                <div class="autocom-box" id="show-list">
                </div>
                <button type="submit" name="submit" id="submit" class="icon">
                    <i class="fa fa-search"></i>
                </button>
            </form>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#search").keyup(function(){
                var name = $(this).val();

                if (name!= ''){
                    $.ajax({
                        url:"action.php",
                        method:"GET",
                        data: {name: name},
                        success:function(data){
                            $("#show-list").fadeIn("fast").html(data);
                        }
                    });
                }
                else{
                    $("#show-list").fadeOut("fast");
                }
            });
            $(document).on('click','#show-list li',function(){
                $('#search').val($(this).text());
                $("#show-list").fadeOut("fast");
            });
        });
    </script>
</body>

</html>