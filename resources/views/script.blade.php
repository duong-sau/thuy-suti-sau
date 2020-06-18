<script type="text/javascript">
				//đọc file ảnh bằng javascript
			var openFile = function(file) {
		    var input = file.target;

		    var reader = new FileReader();
		    reader.onload = function(){
		    var dataURL = reader.result;
		    var output = document.getElementById('output');
		    output.src = dataURL;
		    };
		    reader.readAsDataURL(input.files[0]);
		  };

		</script>
		<script language="javascript">
			// Tạo sự kiện cho ảnh
            // Lấy đối tượng
            var output = document.getElementById("output");
            var ImgProd=document.getElementById("ImgProd");
             
            // Thêm sự kiện cho đối tượng
            output.onclick = function()
            {
              ImgProd.click();
            };
        </script>