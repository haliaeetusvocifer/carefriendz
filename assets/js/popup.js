<!--Top Left-->
<script type="text/javascript">
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#careVideo").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#videoModal").on('hide.bs.modal', function(){
        $("#careVideo").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#videoModal").on('show.bs.modal', function(){
        $("#careVideo").attr('src', url);
    });
});
</script>

<!--Top Right-->
<script type="text/javascript">
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#careVideoRight").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#videoModalRight").on('hide.bs.modal', function(){
        $("#careVideoRight").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#videoModalRight").on('show.bs.modal', function(){
        $("#careVideoRight").attr('src', url);
    });
});
</script>

<!--Bottom Left-->
<script type="text/javascript">
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#careVideoBottomLeft").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#videoModalBottomLeft").on('hide.bs.modal', function(){
        $("#careVideoBottomLeft").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#videoModalBottomLeft").on('show.bs.modal', function(){
        $("#careVideoBottomLeft").attr('src', url);
    });
});
</script>

<!--Bottom Right-->
<script type="text/javascript">
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#careVideoBottomRight").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#videoModalBottomRight").on('hide.bs.modal', function(){
        $("#careVideoBottomRight").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#videoModalBottomRight").on('show.bs.modal', function(){
        $("#careVideoBottomRight").attr('src', url);
    });
});
</script>