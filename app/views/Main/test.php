<script>console.log('ttttt');</script>
<button class="btn btn-primary" id="send">Send ajax</button>
<script src="/test.js"></script>
<script>
$(function() {
    $('#send').click(function() {
        $.ajax({
            url: '/main/test',
            type: 'post',
            data: {'id': 2},
            success: function(res) {
              //let data = JSON.parse(res);
              console.log(res);
              $('.content').append(res);
            },
            error: function() {
            alert('Error');
            }
        });
    });
});
</script>
