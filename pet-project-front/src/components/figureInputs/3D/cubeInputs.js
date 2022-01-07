import React from "react";
import {Input} from "../../input";
import {CircleInputs} from "../2D/circleInputs";

export function CubeInputs(props) {
  return (
    <>
      <div className="row my-2">
        <Input
          label="Side:"
          name="side"
        />
        <Input
          label="Diagonal(AB):"
          name="diagonalSmall"
        />
      </div>
      <div className="row my-2">
        <Input
          label="Diagonal(AC):"
          name="diagonalBig"
        />
        <div className="col"></div>
      </div>
    </>
  )
}
