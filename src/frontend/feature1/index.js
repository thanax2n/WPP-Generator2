import React, { useState } from 'react';
import { createRoot } from 'react-dom/client';
import './assets/scss/style.scss'

const App = () => {
  const [count, setCount] = useState(0);

  const incrementCount = () => {
    setCount(prevCount => prevCount + 1);
  };

  return (
    <div className="mx-app-wrapper">
      <h1>Hello, Webpack and React! :)</h1>
      <p>This is a simple React application with a counter.</p>
      <p>Count: {count}</p>
      <button onClick={incrementCount}>Increment number</button>
    </div>
  );
};

const container = document.getElementById('mxsfwnSimpleApp');
const root = createRoot(container);
root.render(<App />);