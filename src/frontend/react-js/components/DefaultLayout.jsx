import { __ } from '@wordpress/i18n';
import { Outlet, useLocation } from "react-router-dom"
import FlashMessages from "./FlashMessages"

const navigationData = [
	{ name: 'Home', path: '/', label: 'Home' },
];

const DefaultLayout = () => {

	return (
		<div className="mxsfwn-react-js-app-container">

			<Outlet />

			<FlashMessages />
		</div>
	)
}

export default DefaultLayout