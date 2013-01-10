
hs.graphicsDir=static_url+'/javascript/highslide/graphics/';
hs.showCredits=false;

hs.align='center';
hs.dimmingOpacity=0.75;

hs.wrapperClassName='draggable-header';
hs.outlineType='rounded-white';

hs.registerOverlay({
    html:'<div class="closebutton" onclick="return hs.close(this)" title="Close"></div>',
    position:'top right',
    fade:2
});
