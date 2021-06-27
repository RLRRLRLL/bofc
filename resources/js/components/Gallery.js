import gsap from 'gsap';

/** Slider Instance */
class Slider {
	constructor({
		background,
		container,
		delay = 0,
		displacementMap,
		duration = 1,
		images,
		intensity = 0.3,
		size = 400
	} = {}) {
		this.width = size;
		this.height = size;
		this.delay = delay;
		this.duration = duration;
		this.displacementIntensity = intensity;
		this.bgColor = background;

		this.current = 0;
		this.isAnimating = false;
		this.autoUpdateDelay = 3000;

		/**  */
		this.renderer = this.createRenderer(container);
		this.images = this.loadImages(images, displacementMap);
		this.scene = this.createScene();
		this.camera = this.createCamera();
		this.material = this.createMaterial();
		this.geometry = this.createGeometry();
		this.mesh = this.createMesh();

		this.scene.add(this.mesh);

		this.bindMethods();
		this.render();

		this.intervalID = setInterval(this.next, this.autoUpdateDelay);
	}

	/** Create a renderer */
	createRenderer(container) {
		const renderer = new THREE.WebGLRenderer({
			antialias: false
		});

		renderer.setPixelRatio(window.devicePixelRatio);
		renderer.setClearColor(this.bgColor, 1.0);
		renderer.setSize(this.width, this.height);

		container.appendChild(renderer.domElement);

		return renderer;
	}

	/** Create a scene */
	createScene() {
		const scene = new THREE.Scene();

		scene.background = new THREE.Color(this.bgColor);

		return scene;
	}

	/** Create a camera */
	createCamera() {
		const camera = new THREE.OrthographicCamera(
			this.width / -2,
			this.width / 2,
			this.height / 2,
			this.height / -2,
			1,
			1000
		);

		camera.position.z = 1;

		return camera;
	}

	/** Load images */
	loadImages(HTMLImages, HTMLDisplacementMapImage) {
		const images = [];
		const loader = new THREE.TextureLoader();
		loader.crossOrigin = 'anonymous';

		HTMLImages.forEach(image => {
			const slideImage = loader.load(image.getAttribute('src'), slideImage => {
				// let imageWidth = slideImage.image.width;
				// const imageHeight = slideImage.image.height;
				// const imageAspect = imageWidth / imageHeight;
				// const containerAspect = this.width / this.height;
				// const factor = imageAspect / containerAspect
				// console.log(imageAspect, containerAspect);
			});

			// slideImage.generateMipmaps = false;
			slideImage.minFilter = THREE.LinearFilter;
			slideImage.magFilter = THREE.LinearFilter;
			slideImage.anisotropy = this.renderer.capabilities.getMaxAnisotropy();
			(slideImage.center = 0.5), 0.5;

			images.push(slideImage);
		});

		this.displacementMap = loader.load(HTMLDisplacementMapImage.getAttribute('src') + '?v=' + Date.now());
		this.displacementMap.magFilter = THREE.LinearFilter;
		this.displacementMap.minFilter = THREE.LinearFilter;
		this.displacementMap.anisotropy = this.renderer.capabilities.getMaxAnisotropy();

		return images;
	}

	/** Create a material */
	createMaterial() {
		const material = new THREE.ShaderMaterial({
			uniforms: {
				uDisplacementFactor: { type: 'f', value: 0.0 },
				uDisplacementIntensity: { type: 'f', value: this.displacementIntensity },
				uDisplacementMap: { type: 't', value: this.displacementMap },
				uDisplacementDirection: { type: 'f', value: 1.0 },
				uCurrentImage: { type: 't', value: this.images[0] },
				uNextImage: { type: 't', value: this.images[1] }
			},
			vertexShader: this.getVertexShader(),
			fragmentShader: this.getFragmentShader(),
			transparent: true,
			opacity: 1.0
		});

		return material;
	}

	/** Create a vertex shader */
	getVertexShader() {
		return `
			varying vec2 vUv;

			void main() {
			vUv = uv;
			gl_Position = projectionMatrix * modelViewMatrix * vec4(position.xyz, 1.0);
			}
		`;
	}

	/** Create a fragment shader */
	getFragmentShader() {
		return `
			varying vec2 vUv;
			
			uniform sampler2D uCurrentImage;
			uniform sampler2D uNextImage;
			uniform sampler2D uDisplacementMap;
			uniform float uDisplacementFactor;
			uniform float uDisplacementIntensity;
			uniform float uDisplacementDirection;

			void main() {
			vec4 displacementMap = texture2D(uDisplacementMap, vUv) * uDisplacementIntensity;
			vec4 currentVUvY;
			vec4 nextVUvY;

			if (uDisplacementDirection > 0.0) {
				currentVUvY = vUv.y + uDisplacementFactor * displacementMap;
				nextVUvY = vUv.y - (1.0 - uDisplacementFactor) * displacementMap;
			} else {
				currentVUvY = vUv.y - uDisplacementFactor * displacementMap;
				nextVUvY = vUv.y + (1.0 - uDisplacementFactor) * displacementMap;
			}

			vec4 currentImage = texture2D(uCurrentImage, vec2(
				vUv.x,
				currentVUvY
			));

			vec4 nextImage = texture2D(uNextImage, vec2(
				vUv.x,
				nextVUvY
			));

			gl_FragColor = mix(currentImage, nextImage, uDisplacementFactor);
			}
		`;
	}

	/** Create a geometry */
	createGeometry() {
		const geometry = new THREE.PlaneBufferGeometry(this.width, this.height, 1);

		return geometry;
	}

	/** Create a mesh */
	createMesh() {
		const mesh = new THREE.Mesh(this.geometry, this.material);

		return mesh;
	}

	/** Render */
	render() {
		requestAnimationFrame(this.render);

		this.renderer.render(this.scene, this.camera);
	}

	/** Next image */
	next() {
		if (this.isAnimating) return;

		this.current >= this.images.length - 1 ? (this.current = 0) : this.current++;
		this.material.uniforms.uDisplacementDirection.value = 1.0;

		this.change();
	}

	/** Next image */
	prev() {
		if (this.isAnimating) return;

		this.current === 0 ? (this.current = this.images.length - 1) : this.current--;
		this.material.uniforms.uDisplacementDirection.value = 0.0;

		this.change();
	}

	/** Change slide */
	change() {
		this.isAnimating = true;
		clearInterval(this.intervalID);

		this.material.uniforms.uNextImage.value = this.images[this.current];
		this.material.uniforms.uNextImage.needsUpdate = true;

		gsap.to(this.material.uniforms.uDisplacementFactor, this.duration, {
			value: 1,
			delay: this.delay,
			onComplete: () => {
				this.material.uniforms.uCurrentImage.value = this.images[this.current];
				this.material.uniforms.uCurrentImage.needsUpdate = true;
				this.material.uniforms.uDisplacementFactor.value = 0.0;
				this.isAnimating = false;
				this.intervalID = setInterval(this.next, this.autoUpdateDelay);
			}
		});
	}

	// Resize canvas
	resizeCanvas() {
		const canvas = document.querySelector('#slider canvas');

		let width = canvas.clientWidth;
		let height = canvas.clientHeight;

		// console.log(canvas.width, canvas.clientWidth, this.width);

		if (canvas.width != width || canvas.height != height) {
			// console.log('not equal');

			this.width = width;
			this.height = height;

			// in this case just render when the window is resized.
			this.render();
		}
	}

	/** Bind events */
	bindMethods() {
		this.render = this.render.bind(this);
		this.next = this.next.bind(this);
		this.prev = this.prev.bind(this);
	}
}

export function Gallery() {
	// Run slider
	const container = document.getElementById('slider');
	const images = document.querySelectorAll('.slide');
	const displacementMap = document.querySelectorAll('.displacementMap')[0];

	const slider = new Slider({
		background: 0x101417,
		container,
		delay: 0,
		displacementMap,
		duration: 1,
		images,
		intensity: 0.2 //0.05,
	});

	container.addEventListener('click', slider.next);

	slider.resizeCanvas();
	// document.addEventListener('wheel', ({ deltaY }) => {
	// 	deltaY > 0 ? slider.next() : slider.prev();
	// });
}
