
<!-- Modal -->
<div class="modal fade" id="photoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="photoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="photoModalLabel">Snap Photo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <form action="" method="POST" id="photo_form">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div id="my_camera" class=""></div>
                                    <input type="hidden" name="image" class="image-tag" required>
                                </div>
                                <div class="col-sm-6">
                                    <div id="results" class="">Your captured image will appear here...</div>
                                </div>
                            </div>
                            <input type=button value="Take Snapshot" onClick="take_snapshot()">
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="photo_form">Submit</button>
            </div>
        </div>
    </div>
</div>



{{-- <form method="POST" action="">
    @csrf
    <div class="row">
        <div class="d-grid gap-2 d-sm-block">
            <div id="my_camera" class=""></div>
            <input type="hidden" name="image" class="image-tag">
            <div id="results" class="border border-success">Your captured image will appear here...</div>
        </div>
    </div>
    <input type=button value="Take Snapshot" onClick="take_snapshot()">
</form> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

{{-- <script>
    Webcam.set({
        width: 200,
        height: 200,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }
</script> --}}

<script>
    Webcam.set({
        width: 200,
        height: 200,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            document.querySelector('.image-tag').value = data_uri;
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }

    document.querySelector('#snapButton').addEventListener('click', function() {
        take_snapshot();
    });
</script>
