import { BreakpointObserver, Breakpoints } from '@angular/cdk/layout';
import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { Observable, of, Subject } from 'rxjs';
import { map, takeUntil } from 'rxjs/operators';

@Component({
  selector: 'app-topo',
  templateUrl: './topo.component.html',
  styleUrls: ['./topo.component.scss']
})
export class TopoComponent implements OnInit {

  @Input() username: string | undefined = ''

  @Output() onLogout = new EventEmitter()

  destroyed = new Subject<void>()
  currentScreenSize$: Observable<string> = of('')
  displayNameMap = new Map([
    [Breakpoints.XSmall, 'XSmall'],
    [Breakpoints.Small, 'Small'],
    [Breakpoints.Medium, 'Medium'],
    [Breakpoints.Large, 'Large'],
    [Breakpoints.XLarge, 'XLarge'],
  ]);

  constructor(breakpointObserver: BreakpointObserver) {

    this.currentScreenSize$ = breakpointObserver.observe([
      Breakpoints.XSmall,
      Breakpoints.Small,
      Breakpoints.Medium,
      Breakpoints.Large,
      Breakpoints.XLarge,
    ])
      .pipe(
        takeUntil(this.destroyed),
        map(
          result => {

            for (const query of Object.keys(result.breakpoints)) {
              if (result.breakpoints[query]) {
                return this.displayNameMap.get(query) ?? 'Unknown';
              }
            }

            return 'Unknown'
          }
        )
      )
  }

  ngOnInit(): void {
  }

  ngOnDestroy() {
    this.destroyed.next();
    this.destroyed.complete();
  }

  logout() {

    this.onLogout.emit()
  }
}
