import React from "react";
import {Input} from "../../input";

export function RectangleInputs(props) {
  return (
    <>
      <div className="row my-2">
        <Input
          id="sideSmall"
          label="Side a:"
          name="Rectangle_sideSmall"
        />
        <Input
          id="sideBig"
          label="Side b:"
          name="Rectangle_sideBig"
        />
      </div>
      <div className="row my-2">
        <Input
          id="diagonal"
          label="Diagonal:"
          name="Rectangle_diagonal"
        />
        <div className="col"></div>
      </div>
    </>
  )
}
