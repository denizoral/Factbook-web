<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
</head>
<body>
    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#oka">placeholder</a>
        <a href="#oka">placeholder</a>
        <a href="#oka">placeholder</a>
        <a style="float: right;" href="#notifications">Notifications</a>
        <a style="float: right;" href="#settings">Settings</a>
    </div>

    <div class="addPost">
        <h5>Send a post down below</h5>
        <input class="form-control" type="text" placeholder="Default input">
        <input type="button" id="sendBtn" placeholder="Add Post">
    </div>


    @foreach ($posts as $post)
        
        <div class="postContent">
            <div>
                <img class="postLogoPic" src="/img/apple.png">
            </div>
            <div class="postUsername">{{ App\Models\User::find($post->post_author)->name }} </div>
            <div class="postDate">{{ $post->created_at }}</div>
            <h3 style="clear: left; margin-left: 5px;">{{ App\Models\User::find($post->post_content) }}</h3>

    
            <p style="margin-left: 5px;">{{ $post->post_content }}</p>
    

        </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>