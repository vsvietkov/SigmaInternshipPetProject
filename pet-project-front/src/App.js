import 'bootstrap/dist/css/bootstrap.css';
import {Selector} from "./components/selector";
import {FormButtons} from "./components/formButtons";
import {clearErrorSpans, getDefaultInputs, getFigureImage, getFigureInputs} from "./components/tools/helpers";

import React, {useState, useEffect, createContext} from "react";
export const Context = createContext('Circle')

function App() {
  const [figure, setFigure] = useState('Circle');
  useEffect(clearErrorSpans, [figure])

  return (
    <Context.Provider value={figure}>

      <form className="col-md-6 m-auto" onSubmit={calculate}>
        <Selector onchange={(event) => setFigure(event.target.value)}/>
        <div className="card mt-2">
          <div className="card-body shadow-lg">
            {getFigureImage(figure)}
            {getDefaultInputs(figure)}
            {getFigureInputs(figure)}
            <FormButtons />
          </div>
        </div>
      </form>

    </Context.Provider>
  );
}

async function calculate(event) {
  event.preventDefault()
  clearErrorSpans()

  let response = await fetch('http://localhost:8000/api/calculate', {
    method: 'POST',
    headers: {
      'Accept': 'application/json',
    },
    body: new FormData(event.target),
  })
  let result = await response.json()

  switch (response.status) {
    case 200:
      for (const key in result) {
        document.getElementById(key).value = result[key]
      }
      break;
    case 422:
      for (const key in result.errors) {
        document.getElementById(key + '-error').innerHTML = result.errors[key][0]
      }
      break;
    default:
      break;
  }

  return true;
}

export default App;
