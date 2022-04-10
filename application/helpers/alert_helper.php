<?php
function alertFire($type = NULL,$title)
{
    if($type !== NULL)
    {
        ?>
        <script>
            swal.fire({
                title:"<?= $title ?>",
                icon:"<?= $type ?>"
            });
        </script>
        <?php
    }
}