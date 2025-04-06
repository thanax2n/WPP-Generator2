import { __ } from '@wordpress/i18n';
import { Outlet } from "react-router-dom"
import FlashMessages from "./FlashMessages"
import { Navigation } from "./Navigation"

const navigationData = [
	{ name: 'Home', path: '/', label: 'Home' },
	{ name: 'Bin', path: '/bin', label: 'Bin' },
];

const DefaultLayout = () => {	

	return (

		<>
			<header className="mxsfwn-header">
				<h1>Task Master</h1>
				<Navigation navigation={navigationData} />
			</header>

			<div className="mxsfwn-react-js-app-container">

				<Outlet />

				<FlashMessages />
			</div>
		</>
	)
}

export default DefaultLayout