<svg class="hidden">
	<defs>
		<filter id="circleDistortion">
			<feTurbulence type="fractalNoise" baseFrequency="0.01 0.07" numOctaves="5" seed="2" result="noise"/>
			<feDisplacementMap in="SourceGraphic" in2="warp" scale="0" xChannelSelector="R" yChannelSelector="B"/>
		</filter>
	</defs>
</svg>

{{-- Brand Section bubble distortion --}}
<svg class="hidden">
	<filter id="noise">
		<feTurbulence baseFrequency="0.03 0.09" result="NOISE" numOctaves="1" id="turbulence" />
		<feDisplacementMap in="SourceGraphic" in2="NOISE" scale="20" id="displacement"></feDisplacementMap>
	</filter>
</svg>