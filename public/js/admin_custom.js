$(document).ready(function () {

  baseurl = 'http://sukantabala.com';
  // Main Template Color
  var brandPrimary = '#33b35a';

  // ------------------------------------------------------- //
  // Side Navbar Functionality
  // ------------------------------------------------------ //
  $('#toggle-btn').on('click', function (e) {
      e.preventDefault();
      if ($(window).outerWidth() > 1194) {
        $('nav.side-navbar').toggleClass('shrink');
        $('.page').toggleClass('active');
      } else {
        $('nav.side-navbar').toggleClass('show-sm');
        $('.page').toggleClass('active-sm');
      }
  });

  $('.dataTable').DataTable({
    responsive: true,
  });

  // Summernote Initialization
  iniSumernote("section_1","summernote", 200,1,"Add Writing Section 1");
  iniSumernote("section_2","summernote", 200,1,"Add Writing Section 2");
  iniSumernote("summernote","summernote", 200,1,"Enter Blogpost Body");

  function iniSumernote(theclass,id,h,t,p){
    $('.'+theclass).summernote({
      placeholder: p,
      tabsize: t,
      height: h,
      callbacks: {
        onImageUpload: function(files, editor, welEditable) {
          sendFile(files[0], id, editor, welEditable);
        },
        onMediaDelete : function($target, editor, $editable) {
          deleteMedia($target[0].src); // img 
        }
      }
    });
  }

  function sendFile(file, id, editor, welEditable,ul=3) {
    data = new FormData();
    data.append("file", file);
    data.append("ul",ul)
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      }
    });
    $.ajax({
      data: data,
      type: "POST",
      url: baseurl+'/summernoteImgUpload',
      cache: false,
      contentType: false,
      processData: false,
      success: function(sdata) {
        if(sdata.trim().substr(0,14).toLowerCase() == "<!doctype html") { 
          alert("url not found, contact with parameter-x");
        } else  { 
          if(sdata === "size") {
            alert("Image size must be below 300kb");
          } else if(sdata === "error") {
            alert("Image format not acceptable");
          } else if(sdata === "type") {
            alert("jpg, png or gif accepted only");
          } else {
            // console.log(sdata);
            var image = $('<img>').attr('src', baseurl+ '/public/uploads/summernote/'+sdata);
            $('#'+id).summernote("insertNode", image[0]);
          } 
        }   
      }
    });
  }
  function deleteMedia(img) {
    var file = img.substr(img.lastIndexOf("/")+1);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      }
    });
    $.ajax({
      data: {file: file},
      type: "POST",
      url: baseurl+'/summernoteImgDelete',
      success: function(sdata) {
        if(sdata === "error") {
          alert("Img not found, try refresh");
        }
      }
    });
  }

  // Alert Remove
  setTimeout(function() {
    $(".alert").alert('close');
    $(".errortext").remove();
  }, 3000);

  // Limit Words
  function limit_words($string, $word_limit) {
    $words = explode(" ",$string);
    return implode(" ", array_splice($words, 0, $word_limit));
  }
});