<div class="col-md-2">
    {{ $qrCodes }}<br /> <br>
    <a href="" id="container">{!! $qrCodes !!}</a><br /> <br>
    <button id="download" class="mt-2 btn btn-info text-light" onclick="downloadSVG()">Download SVG</button>
</div>
<script>
    function downloadSVG() {
        const svg = document.getElementById('container').innerHTML;
        const blob = new Blob([svg.toString()]);
        const element = document.createElement("a");
        element.download = "w3c.svg";
        element.href = window.URL.createObjectURL(blob);
        element.click();
        element.remove();
    }
</script>
