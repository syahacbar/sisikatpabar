<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SK Ruas Jalan</title>
    <style>

        #skruasjalan {
            padding-top: 7rem;
        }

        #sk-content {
            background: rgba( 255, 255, 255, 0.25 );
            box-shadow: 0 8px 32px 0 rgb(31 38 135 / 37%);
            backdrop-filter: blur( 4px );
            -webkit-backdrop-filter: blur( 4px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            padding: 2rem 10px;
        }

        .accordion-item,
        button.accordion-button {
            border: 0 !important;
            box-shadow: none !important;
            margin-bottom: 9px;
            border-radius: 5px !important;
            font-family: "Segoe UI";
        }

    </style>
  </head>
  <body>
    <div id='skruasjalan'>
        <h2 class="display-4 text-center lh-1 mb-4 ">SK Ruas Jalan</h2>
    </div>
    <div id="sk-content" class="container">
        <div class="accordion" id="accordionExample">
            <?php $no=1; foreach($skruasjalan as $sk) { ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $sk['id'];?>" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo $sk['namask']; ?>
                    </button>
                    </h2>
                    <div id="collapse<?php echo $sk['id'];?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?php echo base_url('upload/skruasjalan/').$sk['filesk'];?>"></iframe>
                        </div>
                    </div>
                    </div>
                </div>
                
                <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>