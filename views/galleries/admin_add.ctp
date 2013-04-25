<?php
	echo $html->script('jquery-1.6.2.min', false);
	echo $html->script('jquery-ui-1.8.14.custom.min', false);
	echo $html->script('jquery.fileUploader', false);
	echo $html->css('ui-lightness/jquery-ui-1.8.14.custom', null, array(), false);
	echo $html->css('fileUploader', null, array(), false);
?>
 <script src="http://d3lp1msu2r81bx.cloudfront.net/kjs/js/lib/kinetic-v4.3.1.min.js"></script>
<div id="galleriesform">
	<h2><?php __('Images');?></h2>
	<?php
		echo $this->Form->create('Gallery', array('type' => 'file'));
		echo $this->Form->input('file', array(
			'type' => 'file', 
			'label' => false, 'div' => false,
			'class' => 'fileUpload', 
			'multiple' => 'multiple'
		));		
		echo $this->Form->button('Upload', array('type' => 'submit', 'id' => 'px-submit'));
		echo $this->Form->button('Clear', array('type' => 'reset', 'id' => 'px-clear'));
		echo $form->end();
	?>
</div>

<a href="#" id="hideupload">hide upload form</a>
<a href="#" id="save">save</a>

<a href="#" id="hidecontrols">hide controls</a>
<div id="container"></div>
<script type="text/javascript">
            var layer;
            var stage;

            $(document).ready(function() {
                // Create the stage
              
				libstage = new Kinetic.Stage({
                    container: 'container',
                    width: 910,
                    height: 150,
					scale:.5
                });
				
				liblayer = new Kinetic.Layer({height:100});
              
                layer = new Kinetic.Layer({
					//scale:.5
				});
				
				stage = new Kinetic.Stage({
                    container: 'container',
                    width: 910,
                    height: 511,
					scale:.47
					
                });
				
			
                // add the layer to the stage
               
				
				libstage.add(liblayer);
				stage.add(layer);
				
					document.getElementById('save').addEventListener('click', function() {
					/*
					 * since the stage toDataURL() method is asynchronous, we need
					 * to provide a callback
					 */
					stage.setScale(200);
					stage.toDataURL({
						
					  callback: function(dataUrl) {
						/*
						 * here you can do anything you like with the data url.
						 * In this tutorial we'll just open the url with the browser
						 * so that you can see the result as an image
						 */
						window.open(dataUrl);
					  }
					});
				  }, false);
					
            });
			
			 function addAnchor(group, x, y, name) {
				var stage = group.getStage();
				//var layer = group.getLayer();
			
				var anchor = new Kinetic.Circle({
				  x: x,
				  y: y,
				  fill: 'transparent',
				  strokeWidth: 0,
				  radius: 8,
				  name: name,
				  draggable: true,
				  dragOnTop: false
				});
				var cursortype = 'pointer';
				switch (name) {
				 
				  case 'topRight':
					cursortype = 'ne-resize';
					break;
				  case 'bottomRight':
					cursortype = 'se-resize';
					break;
				  case 'bottomLeft':
					cursortype = 'sw-resize';
					break;
				}
			
				anchor.on('dragmove', function() {
				  update(this);
				  layer.draw();
				});
				anchor.on('mousedown touchstart', function() {
				  group.setDraggable(false);
				  this.moveToTop();
				});
				anchor.on('dragend', function() {
				  group.setDraggable(true);
				  layer.draw();
				});
				// add hover styling
				anchor.on('mouseover', function() {
				  //var layer = this.getLayer();
				  document.body.style.cursor = cursortype;
				  this.setStrokeWidth(2);
				  layer.draw();
				});
				anchor.on('mouseout', function() {
				 // var layer = this.getLayer();
				  document.body.style.cursor = 'default';
				  this.setStrokeWidth(0);
				  layer.draw();
				});
			
				group.add(anchor);
			  }
			  
			  
			  
			   function addCropAnchor(group, x, y, name) {
				var stage = group.getStage();
				//var layer = group.getLayer();
			
				var anchor = new Kinetic.Circle({
				  x: x,
				  y: y,
				  fill: '#CCC',
				  strokeWidth: 2,
				  radius: 8,
				  name: 'cropanchor',
				  draggable: false,
				  dragOnTop: false
				});
				var cursortype = 'pointer';
				
				
				// add hover styling
				anchor.on('mouseover', function() {
				  //var layer = this.getLayer();
				  document.body.style.cursor = 'pointer';
				  this.setStrokeWidth(2);
				  layer.draw();
				});
				anchor.on('mouseout', function() {
				 // var layer = this.getLayer();
				  document.body.style.cursor = 'default';
				  
				  layer.draw();
				});
				
				anchor.on('click', function() {
					anchor.off('mouseout');
					
					var cropgroup = group.get('.cropgroup');
					var visible = cropgroup[0].getVisible();
					
					//var test = group.get('.cropgroup')[0].show();
					if (visible == false){
						cropgroup[0].show();
					}else{
						cropgroup[0].hide();
					}
					layer.draw();
				});
				group.add(anchor);
			  }
			
			  function addCropGroup(group, x, y, name, img){
				 
			  	var anchorn = new Kinetic.Rect({
					x: 0,
					y: 0,
					width: 100,
					height: 50,
					fill: 'transparent',
					stroke: '#c60',
					strokeWidth: 0,
					name:'croprect',
					draggable: true,
					dragOnTop: false,
				  });
				  
				  var anchor = new Kinetic.Circle({
				  x: 100,
				  y: 50,
				  fill: '#CCC',
				  strokeWidth: 2,
				  radius: 8,
				  name: 'cropsize',
				  draggable: true,
				  dragOnTop: false,
				  dragBoundFunc: function(pos) {
					  	//alert(anchorn.getAbsolutePosition().y);
				 		var newY = pos.y < anchorn.getAbsolutePosition().y ? anchorn.getAbsolutePosition().y : pos.y;
						var newX = pos.x < anchorn.getAbsolutePosition().x ? anchorn.getAbsolutePosition().x : pos.x;
						return {
						  x: newX,
						  y: newY
						};
				  }
				 });
				  
				  var darthVaderCropGroup = new Kinetic.Group({
					  x: 270,
					  y: 100,
					  draggable: true,
					  name:'cropgroup',
					  visible: false
				   });
				anchor.on('mouseover', function() {
				  //var layer = this.getLayer();
				  document.body.style.cursor = 'pointer';
				  this.setStrokeWidth(4);
				  layer.draw();
				});
				anchor.on('dragmove', function() {
				  updateCrop(this);
				  layer.draw();
				});
				anchor.on('mouseout', function() {
				 // var layer = this.getLayer();
				  document.body.style.cursor = 'default';
				  this.setStrokeWidth(2);
				  layer.draw();
				});
				anchor.on('mousedown touchstart', function() {
				  group.setDraggable(false);
				  darthVaderCropGroup.setDraggable(false);
				  this.moveToTop();
				});
				anchor.on('dragend', function() {
				  group.setDraggable(true);
				  darthVaderCropGroup.setDraggable(true);
				  layer.draw();
				});
				anchorn.on('mouseover', function() {
				  //var layer = this.getLayer();
				  document.body.style.cursor = 'pointer';
				  this.setStrokeWidth(4);
				  layer.draw();
				});
				anchorn.on('mouseout', function() {
				 // var layer = this.getLayer();
				  document.body.style.cursor = 'default';
				  this.setStrokeWidth(2);
				  layer.draw();
				});
				anchorn.on('dragmove', function() {
				  layer.draw();
				});
				anchorn.on('mousedown touchstart', function() {
				  group.setDraggable(false);
				  
				});
				anchorn.on('dragend', function() {
				  group.setDraggable(true);
				  layer.draw();
				});
				
				anchorn.on('dblclick dbltap', function() {
				   redraw(darthVaderCropGroup, group);
				   darthVaderCropGroup.hide();
				   layer.draw();
				});
				// add hover styling
				darthVaderCropGroup.add(anchorn);
				darthVaderCropGroup.add(anchor);
				group.add(darthVaderCropGroup);  
			  }
			  
			  function redraw(cropGroup, group){
				var img = group.get('.image')[0];
				var rect = cropGroup.get('.croprect')[0];
				
				var topLeft = group.get('.topLeft')[0];
				var topRight = group.get('.topRight')[0];
				var bottomRight = group.get('.bottomRight')[0];
				var bottomLeft = group.get('.bottomLeft')[0];
				
				var width = topRight.getX() - (topLeft.getX()+10);
				var height = bottomLeft.getY() - (topLeft.getY()+10);
				
				
				var actualImgWidth = img['attrs']['image']['width'];
				var actualImgHeight = img['attrs']['image']['height'];
				
				//get the ratio of image size change
				var xRatio = img['attrs']['image']['width']/width;
				var yRatio = img['attrs']['image']['height']/height;
				
				//alert(xRatio);
				//alert(yRatio);
				
				//alert('crop: '+'x:'+cropGroup.getX()*xRatio+'y: '+cropGroup.getY()*yRatio+'w: '+rect.getWidth()*xRatio+'h: '+rect.getHeight()*yRatio);
				
				//img.setCrop(cropGroup.getX()*xRatio,cropGroup.getY()*yRatio,rect.getWidth()*xRatio,rect.getHeight()*yRatio);
				img.setCrop(cropGroup.getX()*xRatio,cropGroup.getY()*yRatio,rect.getWidth()*xRatio,rect.getHeight()*yRatio);
				img.setSize(rect.getWidth(),rect.getHeight());
				
				var anchorX = img.getWidth();
				var anchorY = img.getHeight();
		
				// update anchor positions
			
				bottomLeft.setY(anchorY);
				bottomLeft.setX(0);
				topRight.setX(anchorX);
				topRight.setY(0);
				bottomRight.setY(anchorY);
				bottomRight.setX(anchorX);
					
				group.get('.cropanchor')[0].hide();
			  }
			  
			 
			  function addCloseAnchor(group, x, y, name) {
				var stage = group.getStage();
				//var layer = group.getLayer();
			
				var anchor = new Kinetic.Circle({
				  x: x,
				  y: y,
				  stroke: '#666',
				  fill: '#ddd',
				  strokeWidth: 2,
				  radius: 16,
				  name: name,
				  draggable: false,
				  opacity:.5
				});
				
				var complexText = new Kinetic.Text({
					text: 'X',
					x:x-6,
					y:y-10,
					fontSize: 18,
					fontFamily: 'Calibri',
					fill: '#555',
					padding: 1,
					align: 'center',
					name:'complexText'
				  });
				  
			    var closeGroup = new Kinetic.Group({
					 name:'closeGroup'
				});	  
				
				anchor.on('mouseout', function() {
				  //var layer = this.getLayer();
				  document.body.style.cursor = 'default';
				  this.setStrokeWidth(2);
				  layer.draw();
				});
				
				anchor.on('mouseover', function() {
				  //var layer = this.getLayer();
				  document.body.style.cursor = 'pointer';
				  this.setStrokeWidth(4);
				  layer.draw();
				});
				
			
				anchor.on('click', function() {
					anchor.off('mouseout');
					anchor.off('mouseover');
					var item = this.getParent().getParent();
					item.remove();
					layer.draw();
					document.body.style.cursor = 'default';
				});
				closeGroup.add(complexText);
				closeGroup.add(anchor);
				group.add(closeGroup);
				
			  }
			  
			  function update(activeAnchor) {
				
				
				var group = activeAnchor.getParent();
			
				var topLeft = group.get('.topLeft')[0];
				var topRight = group.get('.topRight')[0];
				var bottomRight = group.get('.bottomRight')[0];
				var bottomLeft = group.get('.bottomLeft')[0];
				var crop = group.get('.cropanchor')[0];
				var complexText = group.get('.complexText')[0];
				var image = group.get('.image')[0];
				
				var anchorX = activeAnchor.getX();
				var anchorY = activeAnchor.getY();
			
				// update anchor positions
				switch (activeAnchor.getName()) {
				  case 'topLeft':
					topRight.setY(anchorY);
					bottomLeft.setX(anchorX);
					break;
				  case 'topRight':
					topLeft.setY(anchorY-20);
					bottomRight.setX(anchorX);
					crop.setY(anchorY-20);
					complexText.setY(anchorY-28);
					break;
				  case 'bottomRight':
					bottomLeft.setY(anchorY);
					topRight.setX(anchorX);
					
					break;
				  case 'bottomLeft':
					bottomRight.setY(anchorY);
					topLeft.setX(anchorX -20); 
					crop.setX(anchorX+15);
					complexText.setX(anchorX-26);
					break;
				 
				}
				
					image.setPosition(topLeft.getX()+20,topLeft.getY()+20);
					var width = topRight.getX() - (topLeft.getX()+20);
					var height = bottomLeft.getY() - (topLeft.getY()+20);
					
				
				if(width && height) {
				  image.setSize(width, height);
				}
			  }
			  
			 
			 
			  
			  function updateCrop(activeAnchor) {	
				var group = activeAnchor.getParent();
			
				var croprect = group.get('.croprect')[0];
				var cropsize = group.get('.cropsize')[0];
				
				var anchorX = activeAnchor.getX();
				var anchorY = activeAnchor.getY();
			
				// update anchor positions
				switch (activeAnchor.getName()) {
				 
				  case 'cropsize':
				  	croprect.setWidth(anchorX);
					croprect.setHeight(anchorY);
				    break;
				}
				
			  }
			  
			  function loadImages(sources, callback) {
				var images = {};
				var loadedImages = 0;
				var numImages = 0;
				for(var src in sources) {
				  numImages++;
				}
				for(var src in sources) {
				  images[src] = new Image();
				  images[src].onload = function() {
						if(++loadedImages >= numImages) {
					  callback(images, true);
					  //return images;
					}
				  };
				  images[src].src = sources[src];
				}
			  }
			function hideControls(){
				var controls = layer.get('.closeGroup');
				var tot = controls.length;
				for(var i=0;i<tot;i++){
					layer.get('.closeGroup')[i].hide();
					if(layer.get('.cropanchor')[i].getVisible() == true){
						layer.get('.cropanchor')[i].hide();
					}
				}
				layer.draw();
				
			}
			function unhideControls(){
				var controls = layer.get('.closeGroup');
				var tot = controls.length;
				alert(tot);
				for(var i=0;i<tot;i++){
					layer.get('.closeGroup')[i].show();
					layer.get('.cropanchor')[i];
					if(layer.get('.cropanchor')[i].getVisible() == true){
						layer.get('.cropanchor')[i].show();
					}
				}
				layer.draw();
			}

            // Add a block to the screen
            function AddBlock(images, added)
            {
				
				//loadImages(sources);
                // Create the name item
                var newItemName = "Block1";
				
				var darthVaderGroup = new Kinetic.Group({
					  x: 270,
					  y: 100,
					  draggable: true,
					  name:images.darthVader.src+'group',
					});
					
				var libDarthVaderGroup = new Kinetic.Group({
					  x: 5,
					  y: 5,
					  draggable: false,
					  scale:.2
					});
					
				 var darthVaderImg = new Kinetic.Image({
					  x: 0,
					  y: 0,
					  image: images.darthVader,
					  name: 'image'
					});
					
				 var libDarthVaderImg = new Kinetic.Image({
				  x: liblayer.getChildren().length * 1920,
				  y: 0,
				  image: images.darthVader,
				  name: images.darthVader.src,
				});
				
				darthVaderImg.on('mousedown touchstart', function() {
				  darthVaderGroup.setDraggable(true);
				  
				});
				
				darthVaderImg.on('mouseover', function() {
				  
				  document.body.style.cursor = 'pointer';
				});
				darthVaderImg.on('mouseout', function() {
				  
				  document.body.style.cursor = 'default';
				});
				
				
				libDarthVaderGroup.add(libDarthVaderImg);			
				darthVaderGroup.add(darthVaderImg);
				
				addCloseAnchor(darthVaderGroup, -20, -20, 'topLeft');
				addAnchor(darthVaderGroup, darthVaderImg.getWidth(), 0, 'topRight');
				addAnchor(darthVaderGroup, darthVaderImg.getWidth(), darthVaderImg.getHeight(), 'bottomRight');
				addAnchor(darthVaderGroup, 0,  darthVaderImg.getHeight(), 'bottomLeft');
				addCropAnchor(darthVaderGroup, 15, -20, 'cropanchor');
				addCropGroup(darthVaderGroup, 0, 0, 'cropgroup', darthVaderImg);
				darthVaderGroup.on('dragstart', function() {
				  this.moveToTop();
		
				});
				
				libDarthVaderImg.on('dblclick dbltap', function() {
					AddBlock(images, false);				
				});
				
                // Create the first block
                
				
				
                layer.add(darthVaderGroup);
				layer.draw();
				
				if(added==true){
					liblayer.add(libDarthVaderGroup);
					liblayer.draw();
					
				}
				
				
            }

            // Remove a block
            function RemoveBlock()
            {
                // Get the name
				var itemName = ".Block1";
				
				// Get the shape
				var shape = layer.get(itemName)[0];
				
				// Now remove it
				layer.remove(shape);
				layer.draw();
            }
			
			
        </script>
   

<script>
$("#hideupload").click(function() {
	if($("#galleriesform").is(":visible")){
		$("#galleriesform").hide();
		$("#hideupload").text('show upload form');
	}else{
		$("#galleriesform").show();
		$("#hideupload").text('hide upload form');
	}
});
$("#hidecontrols").click(function() {
	if($(this).text().trim() == 'hide controls'){
		hideControls();
		$("#hidecontrols").text('show controls');
	}else{
		unhideControls();
		$("#hidecontrols").text('hide controls');
	}
});


function make_base(imgname)
{
  base_image = new Image();
  base_image.src = 'http://dev.blabfeed.com/media/transfer/img/'+imgname;
  base_image.onload = function(){
    var sources = {
        darthVader: base_image.src,
      };
	loadImages(sources, AddBlock);
	//context.drawImage(base_image, 50, 50);
  }
}
</script>
<script type="text/javascript">
	$(function(){
		$('.fileUpload').fileUploader({
				allowedExtension: 'jpg|jpeg|gif|png|zip|avi',
				afterEachUpload: function(data, status, formContainer){
					//alert(data);
					$jsonData = $.parseJSON( $(data).find('#upload_data').text() );
					//add image to canvas lib
					
					make_base($jsonData['name']);
				}
		});
	});
</script>
<style type="text/css">
.kineticjs-content{
	background-color:#CCC;
	width:910px;
	height:520;
	
}
</style>
