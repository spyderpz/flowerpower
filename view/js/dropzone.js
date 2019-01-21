Dropzone.autoDiscover = false;
$(document).ready(function() {
new Dropzone('#fileInput', {
  url: "#",
  autoProcessQueue: false,

  init: function () {
    var myDropzone = this;
    $("#submit-all").click(function (e) {
      e.preventDefault();
      myDropzone.processQueue();
    });
    myDropzone.on('success', function () {
      myDropzone.removeAllFiles();
      $('#name').val("");
    });
 },
 sending: function (file, xhr, formData) {
    formData.append("name", $('#name').val());
 }
})
})
