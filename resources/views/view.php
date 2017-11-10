<!DOCTYPE html>
<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <div class="span8">
        <?php foreach ($dinners as $dinner): ?>

            <h1><?= $dinner['title'] ?></h1>
            <p><?= (array_key_exists('text', $dinner)) ? $dinner['text'] : ''; ?></p>
            <p><?php if (array_key_exists('image', $dinner)) {
                    $image = '<img src="'.$dinner['image'].'" width=500><br/>';
                    echo $image;
                } ?></p>
            <div>
                <span class="badge badge-success"><?= $dinner['time']; ?></span>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>