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
            console.log(res);
            },
            error: function() {
            alert('Error');
            }
        });
    });
});
</script>