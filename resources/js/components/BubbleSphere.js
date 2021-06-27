import * as THREE from 'three';
import * as dat from 'dat.gui';

// adjustments / debug
const gui = new dat.GUI();

// Loading
const textureLoader = new THREE.TextureLoader();
const normalTexture = textureLoader.load('/images/textures/sphere-texture.png');

// Canvas
const canvas = document.querySelector('canvas#sphere');

// Scene
const scene = new THREE.Scene();

// Objects
const geometry = new THREE.SphereBufferGeometry(0.5, 64, 64);

// Materials
const material = new THREE.MeshStandardMaterial({
	// clearcoat: 0.8,
	metalness: 0.7,
	roughness: 0.2
});

material.normalMap = normalTexture;
material.color = new THREE.Color(0x49ef4);

// Mesh
const sphere = new THREE.Mesh(geometry, material);
scene.add(sphere);

/**
 * Lights
 */

// white light
// const pointLight = new THREE.PointLight(0xffffff, 0.1);
// pointLight.position.set(2, 3, 4);
// scene.add(pointLight);

// red light
const coloredLight = new THREE.PointLight(0xff0000, 2);
coloredLight.position.set(-1.86, 1, -1.65);
coloredLight.intensity = 10;
scene.add(coloredLight);

/**
 * Sizes
 */
const sizes = {
	width: window.innerWidth,
	height: window.innerHeight
};

window.addEventListener('resize', () => {
	// Update sizes
	sizes.width = window.innerWidth;
	sizes.height = window.innerHeight;

	// Update camera
	camera.aspect = sizes.width / sizes.height;
	camera.updateProjectionMatrix();

	// Update renderer
	renderer.setSize(sizes.width, sizes.height);
	renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
});

/**
 * Camera
 */
// Base camera
const camera = new THREE.PerspectiveCamera(75, sizes.width / sizes.height, 0.1, 100);
camera.position.x = 0;
camera.position.y = 0;
camera.position.z = 2;
scene.add(camera);

// Controls
// const controls = new OrbitControls(camera, canvas)
// controls.enableDamping = true

/**
 * Renderer
 */
const renderer = new THREE.WebGLRenderer({
	canvas: canvas,
	alpha: true
});
renderer.setSize(sizes.width, sizes.height);
renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

/**
 * Animate
 */

const clock = new THREE.Clock();

export default function initSphere() {
	const elapsedTime = clock.getElapsedTime();

	// Update objects
	sphere.rotation.y = 0.5 * elapsedTime;

	// Update Orbital Controls
	// controls.update()

	// Render
	renderer.render(scene, camera);

	// Call tick again on the next frame
	window.requestAnimationFrame(initSphere);
}
