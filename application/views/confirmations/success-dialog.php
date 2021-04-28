

<style type="text/css">
  .toast-success {
    background: rgb(40, 167, 69) none repeat scroll 0 0;
    color: #fff;
     border-radius: 5px;
    /*display: none;*/
    /*font-family: "ralewayregular";*/
    padding: 10px 10px 10px;
    position: fixed;
    right: 20px;
    text-align: center;
    top: 50px;
    width: 250px;
    z-index: 1000;
    box-shadow: 1px,1px,1px,1px;
    padding-left: 5px;
}
.toast {
    border-radius: 5px;
    /*display: none;*/
    /*font-family: "ralewayregular";*/
    padding: 20px 10px 10px;
    position: fixed;
    right: 20px;
    text-align: center;
    top: 100px;
    width: 250px;
    z-index: 1000;

}
body {
  font-family: 'Varela Round', sans-serif;
}
.modal-confirm {    
  color: #636363;
  width: 325px;
  font-size: 14px;
}
.modal-confirm .modal-content {
  padding: 20px;
  border-radius: 5px;
  border: none;
}
.modal-confirm .modal-header {
  border-bottom: none;   
  position: relative;
}
.modal-confirm h4 {
  text-align: center;
  font-size: 26px;
  margin: 30px 0 -15px;
}
.modal-confirm .form-control, .modal-confirm .btn {
  min-height: 40px;
  border-radius: 3px; 
}
.modal-confirm .close {
  position: absolute;
  top: -5px;
  right: -5px;
} 
.modal-confirm .modal-footer {
  border: none;
  text-align: center;
  border-radius: 5px;
  font-size: 13px;
} 
.modal-confirm .icon-box {
  color: #fff;    
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  top: -70px;
  width: 95px;
  height: 95px;
  border-radius: 50%;
  z-index: 9;
  background: #82ce34;
  padding: 15px;
  text-align: center;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.modal-confirm .icon-box i {
  font-size: 58px;
  position: relative;
  top: 3px;
}
.modal-confirm.modal-dialog {
  margin-top: 80px;
}
.modal-confirm .btn {
  color: #fff;
  border-radius: 4px;
  background: #82ce34;
  text-decoration: none;
  transition: all 0.4s;
  line-height: normal;
  border: none;
}
.modal-confirm .btn:hover, .modal-confirm .btn:focus {
  background: #6fb32b;
  outline: none;
}
.trigger-btn {
  display: inline-block;
  margin: 100px auto;
}

</style>


<!-- <div class="toast-success "><span class="fas fa-check-circle" style="margin-right: 8px;"></span>Registered Successfully!</div> -->
<!-- <button class="swalDefaultSuccess">toastr</button> -->
<!-- <div id="swalDefaultSuccess" class="swalDefaultSuccess text-center" >click</div> -->

<body>
<div class="text-center">
  <!-- Button HTML (to Trigger Modal) -->
  <a href="#myModal" class="trigger-btn" data-toggle="modal">Click to Open Confirm Modal</a>
  <button class="swalDefaultSuccess">toaster</button>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <div class="icon-box">
          <i class="fas fa-check-circle"></i>
        </div>        
        <h4 class="modal-title w-100">Awesome!</h4> 
      </div>
      <div class="modal-body">
        <p class="text-center">Your booking has been confirmed. Check your email for detials.</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-block " data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>     
</body>
</html>






<script type="text/javascript">

  



$(window).on('load',function(){
  $('#myModal').fadeOut(2000);
});







  // toaster

  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Registered Successfully!'
      })
    });


    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });


</script>