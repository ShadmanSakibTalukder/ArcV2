<x-master>
    <x-slot:title>
        Catelog Part List
    </x-slot:title>
    <h4>Catelog Part List create</h4>
    @if (session()->has('message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session()->has('success_message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <input type="file" id="pdfFile" accept=".pdf">
    <button id="extractButton">Extract Data</button>
    <pre id="output"></pre>
    @push('js')

    <script>
        document.getElementById('extractButton').addEventListener('click', function() {
            var fileInput = document.getElementById('pdfFile');
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    var typedArray = new Uint8Array(event.target.result);

                    pdfjsLib.getDocument(typedArray).promise.then(function(pdf) {
                        var targetPages = [1, 3]; // Specify the page numbers you want to extract data from
                        var numPages = pdf.numPages;
                        var extractedData = [];

                        for (var pageNum = 1; pageNum <= numPages; pageNum++) {
                            if (!targetPages.includes(pageNum)) {
                                continue; // Skip non-targeted pages
                            }

                            pdf.getPage(pageNum).then(function(page) {
                                page.getTextContent().then(function(textContent) {
                                    var pageData = textContent.items.map(function(item) {
                                        return item.str;
                                    });
                                    extractedData.push(pageData.join('\n'));

                                    if (extractedData.length === targetPages.length) {
                                        var outputElement = document.getElementById('output');
                                        outputElement.textContent = extractedData.join('\n\n');
                                    }
                                });
                            });
                        }
                    });
                };

                reader.readAsArrayBuffer(file);
            }
        });
    </script>
    @endpush
</x-master>