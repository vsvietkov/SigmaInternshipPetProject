import 'bootstrap/dist/css/bootstrap.css';
import {Selector} from "./components/selector";
import {FormButtons} from "./components/formButtons";
import {clearErrorSpans, getDefaultInputs, getFigureImage, getFigureInputs} from "./components/tools/helpers";

import React, {useState, useEffect} from "react";

function App() {
  const [figure, setFigure] = useState('Circle');
  useEffect(clearErrorSpans, [figure])

  return (
      <form className="col-md-6 m-auto">
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
  );
}

export default App;
