<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>LIFE - Living It Fully Everyday</title>
<!-- css linked here-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" 
crossorigin="anonymous">
<link rel="stylesheet" href="assets/style/custom.css">

<!-- Bootstrap + js bundle -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" 
crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" 
integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" 
crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
</script>

<!-- validation for jquery  -->

<script>
    $(document).ready(function(){
        $('.health_type').click(function(e){
            e.preventDefault();
            
            $('.health_type').removeClass('active');
            $(this).addClass('active');

            var type_id = $(this).attr('href');
            $('input[name="type_id"]').val(type_id);
        });

        // jquery validate

        $('#myForm').validate({
            rules : {
                firstname : {
                    required : true
                },
                lastname : {
                    required : true
                },
                address : {
                    required : true
                },
                email : {
                    required : true,
                    email: true
                }
            }            
        });
    });
</script>

<!-- font -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" 
                      integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" 
                      crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--- site fonts --> 
<link href="https://fonts.google.com/specimen/Varela+Round?query=round#pairings" rel="stylesheet">


