function basic (){
	swal("Here's a message!");
};

function timer(){
	swal({
		title: "Auto close alert!",
		text: "I will close in 2 seconds.",
		timer: 2000,
		showConfirmButton: false
	});
};

function textUnder(){
	swal("Here's a message!", "It's pretty, isn't it?");
};

function successMessage(){
	swal("Good job!", "You clicked the button!", "success");
};

function warningConfirm(){
	swal({
		title: "Are you sure?",
		text: "You will not be able to recover this imaginary file!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Yes, delete it!',
		closeOnConfirm: false
	},
	function(){
		swal("Deleted!", "Your imaginary file has been deleted!", "success");
	});
};

function warningCancel(){
	swal({
		title: "Are you sure?",
		text: "You will not be able to recover this imaginary file!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: "No, cancel plx!",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm){
    if (isConfirm){
      swal("Deleted!", "Your imaginary file has been deleted!", "success");
    } else {
      swal("Cancelled", "Your imaginary file is safe :)", "error");
    }
	});
};

function customIcon(){
	swal({
		title: "Sweet!",
		text: "Here's a custom image.",
		imageUrl: 'vendors/sweetalert-master/example/images/thumbs-up.jpg'
	});
};

function messageHtml(){
	swal({
		title: "HTML <small>Title</small>!",
		text: 'A custom <span style="color:#F8BB86">html</span> message.',
		html: true
	});
};

function input(){
	swal({
		title: "An input!",
		text: 'Write something interesting:',
		type: 'input',
		showCancelButton: true,
		closeOnConfirm: false,
		animation: "slide-from-top",
		inputPlaceholder: "Write something",
	},
	function(inputValue){
		if (inputValue === false) return false;

		if (inputValue === "") {
			swal.showInputError("You need to write something!");
			return false;
		}
    
		swal("Nice!", 'You wrote: ' + inputValue, "success");

	});
};

function theme() {
	swal({
		title: "Themes!",
		text: "Here's the Twitter theme for SweetAlert!",
		confirmButtonText: "Cool!",
		customClass: 'twitter'
	});
};
 function ajax() {
  swal({
    title: 'Ajax request example',
    text: 'Submit to run ajax request',
    type: 'info',
    showCancelButton: true,
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
  }, function(){
    setTimeout(function() {
      swal('Ajax request finished!');
    }, 2000);
  });
};
