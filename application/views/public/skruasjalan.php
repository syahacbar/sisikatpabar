<!doctype html>
<html lang="en"> 
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SK Ruas Jalan</title>

  </head>
  <body>
    <div id='skruasjalan'>
        <h2 class="display-4 text-center lh-1 mb-4 ">SK Ruas Jalan</h2>
    </div>
    <div id="sk-content" class="container">
        <div class="accordion accordion-flush" id="accordionFlushExample">
        <?php foreach($skruasjalan as $sk) { ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading<?php echo $sk['id'];?>">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $sk['id'];?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $sk['id'];?>">
                <?php echo $sk['namask']; ?>
              </button>
            </h2>
            <div id="flush-collapse<?php echo $sk['id'];?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $sk['id'];?>" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?php echo base_url('upload/skruasjalan/').$sk['filesk'];?>"></iframe>
                </div>
              </div>
            </div>
          </div>
          
          <?php } ?>
        </div>

  </body>
</html>