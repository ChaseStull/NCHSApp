var slide = 0;
var slides = document.getElementsByClassName("slide");
function switch_slide(number_of_slides)
{
	slide++;
	for(var i = 0; i < number_of_slides; i++)
	{
		if(slides[i].getAttribute("id") == slide+1)
		{
			slides[i].style.display = "block";
			console.log("Slide "+i+" was shown");
			console.log("Slides = "+slide);
		}
		else
		{
			slides[i].style.display = "none";
			console.log("Slide "+i+" was hidden");
			console.log("Slides = "+slide);
		}
	}
	if(slide == number_of_slides)
	{
		slide = 0;
		console.log("Slides = "+slide);
	}
	console.log("End of iteration");
}
function hide_slides()
{
	for(var i = 2; i < document.getElementsByClassName("slide").length; i++)
	{
		slides[i].style.display = "none";
		var img = slides[i].firstChild;
		var img_height = img.height;
		var container_height = slides[i].height;
		if(img_height < container_height)
		{
			img.style.marginTop = (container_height-img_height)/2;
			console.log("Margin adjusted");
		}
		else
		{
			img.height = container_height;
			console.log("Image height adjusted");
		}
	}
}
function getHeight(src)
{
	var img = new Image();
	img.src = src;
	var height = img.height;
	return height;
}
function set_margins()
{
	for(var i = 0; i < document.getElementsByClassName("slide").length; i++)
	{
		var img_height = getHeight(slides[i].firstElementChild.getAttribute("src"));
		console.log("Slide "+i+": height = "+img_height);
		img_height += 0;
		//var img_height = img_height_px.substr(-2, 0);
		var container_height = 400;
		if(img_height < container_height)
		{
			var img_margin = (container_height-img_height)/2;
			slides[i].firstElementChild.style.marginTop = img_margin+"px";
			console.log("Margin adjusted to "+img_margin);
		}
		else
		{
			slides[i].firstElementChild.style.marginTop = 0-(img_height/2)+"px";
			console.log("Image height adjusted to "+slides[i].firstElementChild.style.marginTop);
		}
	}
}
function slide_switch(number_of_slides)
{
	setInterval("switch_slide("+number_of_slides+", "+slide+")", 4000);
	console.log("Slides = "+slide+"\nEnd slide_switch");
}