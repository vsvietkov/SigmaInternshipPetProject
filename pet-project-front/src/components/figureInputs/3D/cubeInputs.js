import React from "react";
import {Input} from "../../input";

export function CubeInputs(props) {
  return (
    <>
      <div className="row my-2">
        <Input
          id="side"
          label="Side:"
          name="side"
        />
        <Input
          id="diagonalSmall"
          label="Diagonal(AB):"
          name="Cube_diagonalSmall"
        />
      </div>
      <div className="row my-2">
        <Input
          id="diagonalBig"
          label="Diagonal(AC):"
          name="Cube_diagonalBig"
        />
        <div className="col"></div>
      </div>
    </>
  )
}
