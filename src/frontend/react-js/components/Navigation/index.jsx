import { NavLink } from "react-router-dom"
import clsx from 'clsx'

export const Navigation = ({ navigation }) => {

  return (
    <nav className="mxsfwn-nav-links">
      {navigation.map((item) => (
        <NavLink
          key={item.name}
          to={item.path}
          className={({ isActive }) =>
            clsx('mxsfwn-nav-link', isActive && 'mxsfwn-nav-link_active')
          }
        >
          {item.label}
        </NavLink>
      ))}
    </nav>
  )
}