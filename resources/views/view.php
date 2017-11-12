<!DOCTYPE html>
<html>
<head>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <?php foreach ($dinners as $dinner): ?>
        <div class="col-lg-4 col-md-6 col-sm-6 ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4><?= $dinner['title'] ?></h4>
                    <span class="badge badge-success"><?= $dinner['time']; ?></span>
                </div>
                <div class="panel-body panel-height">
                    <div class="text-center">
                        <?= (array_key_exists('text', $dinner)) ? $dinner['text'] : ''; ?>
                            <span>
                                <?php if (array_key_exists('image', $dinner)) { ?>
                                <a href="#" title="<?= $dinner['title'] ?> <?= $dinner['time']; ?>" class="thumb">
                                <img src="<?= $dinner['image']; ?>"
                                     class="img-responsive img-rounded" data-toggle="modal"
                                     data-target=".modal-profile-lg">
                                </a>
                                <?php } ?>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- .modal-profile -->
<div class="modal fade modal-profile" tabindex="-1" role="dialog" aria-labelledby="modalProfile" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">×</button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- //.modal-profile -->

</body>
</html>

<script>
    $(document).ready(function() {
        /* show lightbox when clicking a thumbnail */
        $('a.thumb').click(function(event){
            event.preventDefault();
            var content = $('.modal-body');
            content.empty();
            var title = $(this).attr("title");
            $('.modal-title').html(title);
            content.html($(this).html());
            $(".modal-profile").modal({show:true});
        });

    });
</script>