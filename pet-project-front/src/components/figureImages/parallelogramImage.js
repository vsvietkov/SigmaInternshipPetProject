import React from "react";

export function ParallelogramImage(props) {
  return (
    <div className="row">
      <svg viewBox="0 0 100 31">
        <polygon points="20,25 40,5 80,5 60,25" className="svgFigurePolygon" />
        <polygon points="20,25 80,5" className="svgFigurePolygon" />
        <polygon points="40,5 60,25" className="svgFigurePolygon" />
        <polygon points="40,5 40,25 38,25 38,23 40,23" className="svgFigurePolygon" />
        <text x={14} y={25} className="svgSmallLabel">A</text>
        <text x={36} y={5} className="svgSmallLabel">B</text>
        <text x={80} y={5} className="svgSmallLabel">C</text>
        <text x={64} y={26} className="svgSmallLabel">D</text>
        <text x={37} y={31} className="svgSmallLabel">H</text>
      </svg>
    </div>
  )
}
