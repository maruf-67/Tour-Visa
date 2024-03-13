<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Form Draft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <div class="container">
        <h1>Multiple Form Draft</h1>
        <hr>
        <div class="mb-3 generateForms">
            <label for="numFormsInput" class="form-label">Number of Forms</label>
            <input type="number" class="form-control" id="numFormsInput" min="1" value="3">
        </div>
        <button id="generateForms" class="btn btn-primary">Generate Forms</button>
        <div id="formsContainer" style="display: none;"></div> <!-- Initially hidden -->
        <div class="progress mt-4">
            <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <button id="submitAll" class="btn btn-primary mt-3">Submit All</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var $numFormsInput = $('#numFormsInput');
            var $formsContainer = $('#formsContainer');
            var $progressBar = $('#progressBar');

            var numForms = 1;
            var formsFilled = 0;
            var drafts = [];

            function updateProgressBar() {
                var completionPercentage = (formsFilled / numForms) * 100;
                $progressBar.css('width', completionPercentage + '%').attr('aria-valuenow', completionPercentage);
            }

            function generateForm(formIndex) {
                return `
                <form class="form" id="form${formIndex}" style="display: ${formIndex === 1 ? 'block' : 'none'};">
                    <h2>Form ${formIndex}</h2>

                    <div class="progress-container">
                        <ul id="progressbar">
                            <li class="active" id="step1">
                                <strong>Step 1</strong>
                            </li>
                            <li id="step2">
                                <strong>Step 2</strong>
                            </li>
                        </ul>
                        <div class="progress mt-4" id="progressBar${formIndex}">
                            <div class="progress-bar form-progress" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div id="step1${formIndex}" class="form-step">
                        <div class="mb-3">
                            <label for="field1${formIndex}" class="form-label">Field 1</label>
                            <input type="text" class="form-control" id="field1${formIndex}" name="field1" required>
                        </div>
                        <div class="mb-3">
                            <label for="field2${formIndex}" class="form-label">Field 2</label>
                            <input type="text" class="form-control" id="field2${formIndex}" name="field2" required>
                        </div>
                        <button type="button" class="btn btn-primary next-btn">Next</button>
                    </div>

                    <div id="step2${formIndex}" class="form-step" style="display: none;">
                        <div class="mb-3">
                            <label for="email${formIndex}" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email${formIndex}" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone${formIndex}" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone${formIndex}" name="phone" required>
                        </div>
                        <button type="button" class="btn btn-secondary prev-btn">Previous</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                `;
            }

            $('#generateForms').click(function() {
                numForms = parseInt($numFormsInput.val());
                $formsContainer.empty();
                drafts = []; // Reset drafts when generating new forms
                for (var i = 1; i <= numForms; i++) {
                    $formsContainer.append(generateForm(i));
                }
                $formsContainer.show(); // Show forms container after generating forms
                formsFilled = 0; // Reset formsFilled when generating new forms
                updateProgressBar(); // Update progress bar after generating forms
            });

            document.getElementById("generateForms").addEventListener("click", function() {
            // Hide the code block
            document.querySelector("div.generateForms").style.display = "none";
            document.getElementById("generateForms").style.display = "none";
            });



            $(document).on('click', '.next-btn', function() {
                var $form = $(this).closest('.form');
                var formIndex = $form.attr('id').replace('form', '');
                $form.find('.form-step').hide();
                $('#step2' + formIndex).show();
                $('#progressBar' + formIndex).show();
                $form.find('.form-progress').css('width', '50%').attr('aria-valuenow', 50);
            });

            $(document).on('click', '.prev-btn', function() {
                var $form = $(this).closest('.form');
                var formIndex = $form.attr('id').replace('form', '');
                $form.find('.form-step').hide();
                $('#step1' + formIndex).show();
                $('#progressBar' + formIndex).hide();
                $form.find('.form-progress').css('width', '0%').attr('aria-valuenow', 0);
            });

            $(document).on('submit', '.form', function(event) {
                event.preventDefault();
                var formData = new FormData(this); // Create FormData object with the form data
                var formIndex = $(this).attr('id').replace('form', '');
                drafts[formIndex - 1] = formData; // Save draft data
                formsFilled++;
                updateProgressBar();
                $(this).hide(); // Hide the submitted form
                // Show next form if available
                if (formsFilled < numForms) {
                    $('#form' + (parseInt(formIndex) + 1)).show();
                }
                console.log('Form ' + formIndex + ' data:', Object.fromEntries(formData.entries()));
            });

            $('#submitAll').click(function() {
                console.log('Submitting all forms:');
                for (var i = 0; i < drafts.length; i++) {
                    var formIndex = i + 1;
                    var formData = drafts[i];
                    console.log('Form ' + formIndex + ' data:', Object.fromEntries(formData.entries()));
                    // Here you can send formData to the server for further processing
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
