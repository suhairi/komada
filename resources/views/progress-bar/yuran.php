<div id="progressbar"><div class="progress-label">Loading...</div></div>
<style>
    .ui-progressbar {
        position: relative;
    }
    .progress-label {
        position: absolute;
        left: 45%;
        top: 4px;
        font-weight: bold;
        text-shadow: 1px 1px 0 #fff;
    }
</style>


<script>
    $(document).ready(function() {

        $('#progressbar').hide();

        $('#btn_submit').click(function() {
            $('#form').hide();
            $('#tambahan').hide();
            $('#progressbar').show();

            var progressbar = $( "#progressbar" ),
                progressLabel = $( ".progress-label" );

            progressbar.progressbar({
                value: false,
                change: function() {
                    progressLabel.text( progressbar.progressbar( "value" ) + "%" );
                },
                complete: function() {
                    progressLabel.text( "Complete!" );
                }
            });

            function progress() {
                var val = progressbar.progressbar( "value" ) || 0;

                progressbar.progressbar( "value", val + 1 );

                if ( val < 999 ) {
                    setTimeout(progress, 1000);
                }
            }

            setTimeout(progress, 100 );

        });

    })

</script>