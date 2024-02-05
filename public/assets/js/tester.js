/* trainer page */
let questionNo = 5;
let optionNo = 4;
// var baseUrl = 'https://bafarag.hadramout-bootcamps.com/';
var baseUrl = 'http://127.0.0.1:8000/exams/';

/* start submit exam */
$("#submitTest").click(function() {
    /* form validation */
    flage = false;
    var form = document.getElementById('examCreateForm');
      for(var i=0; i < form.elements.length; i++){
        if (form.elements[i].value == '' && form.elements[i].hasAttribute('required')) {
            form.elements[i].style.border = '1px solid red';
            flage=false;
            break;
        } else if(form.elements[i].value != '' && form.elements[i].hasAttribute('required')){
            flage=true;
            form.elements[i].style.border = '1px solid #ced4da';
            }
      }
      console.log(flage);
      if(flage == true){
        console.log('some thing')

        var quizArray = []; // Array to store questions and options
        var exam_info={
            'exam_name': $('#exam_name').val(),
            'date_of_preTest':$('#date_of_preTest').val(),
            'date_of_postTest':$('#date_of_postTest').val(),
            'time_of_preTest':$('#time_of_preTest').val(),
            'time_of_postTest':$('#time_of_postTest').val()
        }
        quizArray.push(exam_info);
        $(".question").each(function() {
            var question = $(this).find(".questionInput").val();
            var options = {};

            // Iterate through options within the current question container
            $(this).find(".options-list li").each(function () {
                var optionInput = $(this).find(".optionInput").val();
                var radioValue = $(this).find("input[type='radio']").is(':checked') ? 'true' : 'false';

                // Add option to options object with radio button value as the key
                options[optionInput] = radioValue;
            });

            // Create a question object and add it to the quizArray
            var questionObject = {
                question: question,
                options: options
            };

            quizArray.push(questionObject);
        });
        console.log(quizArray);
        var token = $("input[name='_token']").val();

        // Send the quizArray to the Laravel route using AJAX
        $.ajax({
            url: `http://127.0.0.1:8000/exams`, // Replace with the actual route URL
            type: 'POST',
            data: {
                "_token":token,
                quizArray: JSON.stringify(quizArray) }, // Send the quizArray as JSON string
            success: function(response) {
                // Handle the server's response if needed
                document.write(response);
            },
            error: function(error) {
                // Handle errors if any
                console.log("Error submitting quiz:"+ error);
                createImageBitmap
                $('#error').append(error);
            }
        });
      }
    /* end form validation */
});
/* end submit exam */

/* start exsisting exam */
$("#editExam").click(function() {
    /* form validation */
    flage = false;
    var form = document.getElementById('examEditForm');
    for(var i=0; i < form.elements.length; i++){
        if (form.elements[i].value == '' && form.elements[i].hasAttribute('required')) {
            form.elements[i].style.border = '1px solid red';
            flage=false;
            break;
        } else if(form.elements[i].value != '' && form.elements[i].hasAttribute('required')){
            flage=true;
            form.elements[i].style.border = '1px solid #ced4da';
            }
      }
      console.log(flage);
      if(flage == true){
        const exam_id = $('#exam_id').val();
        var quizArray = []; // Array to store questions and options
        var exam_info={
            'exam_name': $('#exam_name').val(),
            'date_of_preTest':$('#date_of_preTest').val(),
            'date_of_postTest':$('#date_of_postTest').val(),
            'time_of_preTest':$('#time_of_preTest').val(),
            'time_of_postTest':$('#time_of_postTest').val()
        }
        quizArray.push(exam_info);
        $(".question").each(function() {
            var question = $(this).find(".questionInput").val();
            var options = {};

            // Iterate through options within the current question container
            $(this).find(".options-list li").each(function () {
                var optionInput = $(this).find(".optionInput").val();
                var radioValue = $(this).find("input[type='radio']").is(':checked') ? 'true' : 'false';

                // Add option to options object with radio button value as the key
                options[optionInput] = radioValue;
            });

            // Create a question object and add it to the quizArray
            var questionObject = {
                question: question,
                options: options
            };

            quizArray.push(questionObject);
        });
        console.log(quizArray);
        var token = $("input[name='_token']").val();
        // Send the quizArray to the Laravel route using AJAX
        $.ajax({
            url: `http://127.0.0.1:8000/exams/${exam_id}`, // Replace with the actual route URL
            type: 'PUT',
            data: {
                "_token":token,
                quizArray: JSON.stringify(quizArray) }, // Send the quizArray as JSON string
            success: function(response) {
                // Handle the server's response if needed
                document.write(response);
            },
            error: function(error) {
                // Handle errors if any
                console.log("Error submitting quiz:"+ error);
                createImageBitmap
                $('#error').append(error);
            }
        });
      }
    /* end form validation */
});
/* end edit exsisting exam */


$('.newExam').css('transition','all 0.7s ')
$(".newExam1").hover(function() {
    $(this).toggleClass('newExam2');
    $(this).next().toggleClass('newExam2');
});
$(".newExam2").hover(function() {
    $(this).toggleClass('newExam2');
    $(this).prev().toggleClass('newExam2');
});

$("#addQuestion").click(function(){
$('#examCreateForm').append(
    `
    <div id="div${questionNo}" class="question p-3 bg-primary mb-4" ondragstart="drag(event)" draggable="true"
    ondrop="drop(event)" ondragover="allowDrop(event)" dir="ltr">
                <input type="text" class="questionInput form-control mb-2 w-50" required placeholder="اكتب سوالك هنا ..." name="q" value="">
                <ul class="options-list list-unstyled">
                  <li>
                    <input type="radio" id="q${questionNo}-firstOption" name="q${questionNo}-Option" value="HTML">
                    <label for="q${questionNo}-firstOption">
                        <input type="text" name="q${questionNo}-Option" class="q${questionNo}-Option form-control" placeholder="OPTION" required>
                    </label>
                    <i class="fa-solid fa-xmark"></i>
                  </li>
                  <li>
                    <input type="radio" id="q${questionNo}-secondOption" name="q${questionNo}-Option" value="HTML">
                    <label for="q${questionNo}-secondOption">
                        <input type="text" name="q${questionNo}-Option" class="q${questionNo}-Option  form-control" placeholder="OPTION" required>
                    </label>
                    <i class="fa-solid fa-xmark"></i>
                  </li>
                  <li>
                    <input type="radio" id="q${questionNo}-thirdOption" name="q${questionNo}-Option" value="HTML">
                    <label for="q${questionNo}-thirdOption">
                        <input type="text" name="q${questionNo}-Option" class="q${questionNo}-Option  form-control" placeholder="OPTION" required>
                    </label>
                    <i class="fa-solid fa-xmark"></i>
                  </li>
                  <li>
                    <input type="radio" id="q${questionNo}-fourthOption" name="q${questionNo}-Option" value="HTML">
                    <label for="q${questionNo}-fourthOption">
                        <input type="text" name="q${questionNo}-Option" class="q${questionNo}-Option  form-control" placeholder="OPTION" required>
                    </label>
                    <i class="fa-solid fa-xmark"></i>
                  </li>
                </ul>
                <div class="addOptionBtn text-white border">
                  <span>اضافة خيار</span>
                  <i class="fa fa-plus"></i>
                </div>
                <i class="fa-solid fa-compress"></i>
                <div class="icons">
                  <i class="fa fa-trash"></i>
                </div>
            </div>
    `
)
questionNo++;
});

$(".questions").on("click",'.addOptionBtn', function() {
    var optionsList = $(this).prev(".options-list");
    let name = optionsList.find('li > input').attr('name');
    let labelAttr = optionsList.find('label').attr('for');
    var newOption = $(`
    <li>
      <input type="radio" id="new-question${optionNo}" name="${name}" value="HTML">
      <label for="new-question${optionNo}">
          <input type="text" name="newOPtion-Option" class="form-control optionInput" placeholder="OPTION" required>
      </label>
      <i class="fa-solid fa-xmark"></i>
    </li>
    `);
    optionsList.append(newOption);
    optionNo++;
});

$(".questions").on('click','.icons .fa-trash',function(){
$(this).closest('.question').remove();
});

$(".questions").on('click','ul li .fa-xmark',function(){
$(this).closest('li').remove();
});
/* this code to submit student exam */
$("#saveTest").click(function() {
    let examId = $('#exam_id').val();
    var exam = {};
    var options = []; // Array to store questions and options
    // Iterate through question containers
    $(".question").each(function() {
        var questionOptin = '';
        // Iterate through options within the current question container
        $(this).find(".options-list li").each(function () {
            if($(this).find("input[type='radio']").is(':checked')){
                questionOptin = $(this).find(".questionOptin").attr('value');
                options.push(questionOptin);
            }
        });
        exam ={
            'exam_id':examId,
            'options':options
        }

    });

    // Display the quiz array in the console (you can replace this with your desired logic)
    console.log("Quiz Array:", exam);
    var token = $("input[name='_token']").val();
    $.ajax({
        url: `http://127.0.0.1:8000/result`, // Replace with the actual route URL
        type: 'POST',
        headers: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
        data: {
            "_token":token,
             exam: JSON.stringify(exam) }, // Send the quizArray as JSON string
        success: function(response) {
            // Handle the server's response if needed
            document.write(response);
        },
        error: function(error) {
            // Handle errors if any
            console.log("Error submitting quiz:");
        }
    });
});


/* start timat java */
const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10;
const ALERT_THRESHOLD = 5;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = $('#timer').val()*60;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;
function onTimesUp() {
  clearInterval(timerInterval);
  $('#saveTest').click();
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      onTimesUp();

    }
  }, 1000);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  return `${minutes}:${seconds}`;
}

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}
/* end timat java */

/*chart js*/
const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

/* show js chart */
$('#showChart').click(function() {
    var ratio =[];
    $(".ratio").each(function() {
        // Iterate through options within the current question container
        ratio.push($(this).html());
    });
    console.log(ratio);
});

/* this code for move element */
function allowDrop(ev) {
    ev.preventDefault();
  }

  function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
  }

  function drop(ev) {
    ev.preventDefault();
    var draggedId = ev.dataTransfer.getData("text");
    var draggedElement = document.getElementById(draggedId);
    console.log(draggedId);
    // Get the parent node of the dragged element
    var draggedParent = draggedElement.parentNode;
    var index = Array.from(draggedParent.children).indexOf(draggedElement);
    // console.log(index);
    // Get the target node (the drop target)
    console.log(ev.target);
    var dropTarget = ev.target.parentNode.parentNode;
    var index2 = Array.from(draggedParent.children).indexOf(dropTarget);
    console.log(index2);

    // Swap places using insertBefore
    if(index > index2){
        draggedParent.insertBefore(draggedElement, dropTarget);
    }else{
        draggedParent.insertBefore(dropTarget,draggedElement );
    }
    // draggedParent.insertBefore(draggedElement, dropTarget.nextSibling);
    // draggedParent.insertAfter(draggedElement, dropTarget.nextSibling);

    // Reset draggable attribute
    draggedElement.draggable = true;
  }

