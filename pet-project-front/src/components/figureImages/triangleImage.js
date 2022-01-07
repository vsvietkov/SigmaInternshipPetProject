import React from "react";

export function TriangleImage(props) {
  return (
    <div className="row">
      <svg viewBox="0 0 100 30">
        <polygon points="40,25 40,5 60,25" className="svgFigurePolygon" />
        <polygon points="40,25 50,15" className="svgFigurePolygon" />
        <polygon points="49,16 48,15 49,14 50,15" className="svgFigurePolygon" />
        <text x={35} y={29} className="svgSmallLabel">C</text>
        <text x={35} y={5} className="svgSmallLabel">A</text>
        <text x={62} y={25} className="svgSmallLabel">B</text>
        <text x={50} y={13} className="svgSmallLabel">H</text>
      </svg>
    </div>
  )
}
