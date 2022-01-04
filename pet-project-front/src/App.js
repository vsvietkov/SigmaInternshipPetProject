import 'bootstrap/dist/css/bootstrap.css';
import {Selector} from "./components/selector";

function App() {
  return (
      <div className="col-md-6 m-auto">
        <Selector />
        <div className="card mt-2">
          <div className="card-body"></div>
        </div>
      </div>
  );
}

export default App;
