import React from "react";

export function TriangleImage(props) {
  return (
    <div className="row">
      <svg viewBox="0 0 100 30">
        <polygon points="30,25 70,25 50,5" style={ {fill:"rgba(0,0,0,0)", stroke: "red", strokeWidth: 0.3} } />
      </svg>
    </div>
  )
}
