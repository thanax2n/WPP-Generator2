import React from 'react';
import { NavLink } from 'react-router-dom';

export const Button = ({ type = 'button', to, className = '', variant = 'primary', children, ...props }) => {
  const buttonClass = `wppgn-btn wppgn-btn_${variant} ${className}`;

  if (to) {
    return (
      <NavLink to={to} className={buttonClass} {...props}>
        {children}
      </NavLink>
    );
  }

  return (
    <button type={type} className={buttonClass} {...props}>
      {children}
    </button>
  );
};

