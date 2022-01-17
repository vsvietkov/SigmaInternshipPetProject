import React, {useContext} from "react";
import {Input} from "../../input";
import {Context} from "../../../App";

export function CircleInputs(props) {
  let figure = useContext(Context)
  return (
    <div className="row my-2">
      <Input
        id="radius"
        label="Radius:"
        name="radius"
      />
      <Input
        id="diameter"
        label="Diameter:"
        name={figure + '_diameter'}
      />
    </div>
  )
}
