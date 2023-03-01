<!DOCTYPE html>
<html>

{{-- <head> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
{{-- </head> --}}

<body>

    <div class="container">
        <h1 class="text-center">Laravel webcam capture image and save from camera - ItSolutionStuff.com</h1>

        <form method="POST" action="">
            @csrf
            <div class="row">
            <div class="d-grid gap-2 d-sm-block">
                {{-- <div class="col-sm-6"> --}}
                    <div id="my_camera" class=""></div>
                    {{-- <br /> --}}
                    
                    <input type="hidden" name="image" class="image-tag">
                {{-- </div> --}}
                {{-- <div class="col-sm-6"> --}}
                    <div id="results" class="border border-success">Your captured image will appear here...</div>
                {{-- </div> --}}
                
            </div>
        </div>
        <div class="col-md-12 text-center">
            <br />
            <button class="btn btn-success">Submit</button>
        </div>
            <input type=button value="Take Snapshot" onClick="take_snapshot()">
        </form>
    </div>

    <script language="JavaScript">
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
    </script>

</body>

</html>
